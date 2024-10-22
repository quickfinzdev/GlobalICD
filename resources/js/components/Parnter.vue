<template>
    <v-container style="max-width: 1350px;" class="pt-12">

        <v-row>
            <v-col cols="12 d-flex align-center">
                <v-btn variant="outlined" class="text-none mr-2 rounded-lg" style="min-width: 10px;max-width: 10px;"
                    to="/dashboard/home"><v-icon>mdi-arrow-left-top</v-icon></v-btn>
                <div class="ml-4">
                    <h3 class="mb-0 roboto-thin" style="font-size: 1.5rem;  font-weight: 600; line-height: 1.25;">Certificate</h3>
                </div>
                <v-spacer></v-spacer>

                <v-responsive max-width="200" class="mr-4">
                    <v-text-field density="compact" prepend-inner-icon="mdi-magnify" flat hide-details label="Search"
                        rounded="lg" single-line variant="solo" v-model="search"></v-text-field>
                </v-responsive>
                <v-responsive max-width="200" class="mr-4">
                    <v-text-field @change="loadItems" v-model="startDate" label="Select" density="compact" flat
                        hide-details rounded="lg" single-line variant="solo" type="date"></v-text-field>
                </v-responsive>
                <v-responsive max-width="200" class="mr-4">
                    <v-text-field @change="loadItems" v-model="endDate" label="Select" density="compact" flat
                        hide-details rounded="lg" single-line variant="solo" type="date"></v-text-field>
                </v-responsive>
                <v-btn class="text-none" color="#233044" variant="flat" @click="drawer = true"><i class="bi bi-plus"></i>
                    Add</v-btn>
            </v-col>
            <v-col cols="12">

                <v-card class="mx-auto elevation-0 rounded-4">
                    <v-card-text>
                        <v-data-table-server v-model:items-per-page="itemsPerPage" :headers="headers"
                            :items-length="totalItems" :items="serverItems" :loading="loading" :search="search"
                            item-value="name" @update:options="loadItems" show-select="true">

                            <template v-slot:item.name="{ item }">
                                <div class="d-flex align-center">
                                    <v-img :src="item.image" style="max-width: 50px;"> </v-img>
                                    <p class="mb-0 ml-4">{{ item.name }}</p>
                                </div>
                            </template>

                            <template v-slot:item.status="{ item }">
                                <v-chip size="x-small" v-if="item.status == 0">Inactive</v-chip>
                                <v-chip size="x-small" v-if="item.status == 1">Active</v-chip>
                            </template>
                            <template v-slot:item.created_at="{ item }">
                                {{ convertDateFormat(item.created_at) }}
                            </template>

                            <template v-slot:item.actions="{ item }">
                                <div class="d-flex float-right">
                                    <v-btn prepend-icon="mdi-eye" :to="'/dashboard/order-details/' + item.id"
                                        color="blue-lighten-4" class="elevation-0 mr-1" size="small"
                                        style="text-transform: none;">View</v-btn>

                                    <v-menu density="compact" size="">
                                        <template v-slot:activator="{ props }">
                                            <v-btn v-bind="props" size="small" variant="flat" color="grey-lighten-5"
                                                style="min-width: none;min-width: 8px; padding: 0px;"><v-icon
                                                    style="font-size: 22px;">mdi-chevron-down</v-icon></v-btn>
                                        </template>
                                        <v-list density="compact" size="x-small" nav>
                                            <v-list-item>Account Setting</v-list-item>
                                            <v-list-item>Edit</v-list-item>
                                        </v-list>
                                    </v-menu>
                                </div>
                            </template>
                        </v-data-table-server>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>


    <v-navigation-drawer location="right" v-model="drawer" :location="$vuetify.display.mobile ? 'bottom' : undefined"
        temporary width="400">
        <v-row class="pa-10">
            <v-col cols="12 d-flex align-center">
                <v-btn variant="outlined" class="text-none mr-2 rounded-lg" style="min-width: 10px;max-width: 10px;"
                    @click="drawer = false"><v-icon>mdi-arrow-left-top</v-icon></v-btn>
                <div class="ml-4">
                    <h5 class="mb-0">Partners Details</h5>
                </div> 
            </v-col>
            <v-col cols="12">
                <div style="position: relative;   max-width: 500px;  display: flex;   width: 100%; margin-bottom:10px;">
                    <div style="width: 100%; float: left; height: 150px; border: 1px dotted; font-size: 27px; border-radius: 6px; overflow: hidden; "
                        v-if="dataString.image != null">
                        <v-img :src="dataString.image" v-if="dataString.image != null"></v-img>
                    </div>
                    <div style="display: none">
                        <input type="file" id="image" ref="image" v-on:change="fileUpload()" />
                    </div>
                    <v-btn v-if="dataString.image != null" @click="removeImge()" class="removeimagbtn"
                        style="position: absolute;  left: 50%; top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">Remove</v-btn>
                    <label for="image" v-if="dataString.image == null"
                        style=" width: 100%;  float: left; position: relative;  height: 150px; border: 1px dotted; font-size: 27px;  border-radius: 6px;">
                        <span class="removeimagbtn"
                            style="position: absolute; left: 50%;top: 50%; -webkit-transform: translate(-50%, -50%); transform: translate(-50%, -50%); font-size: 70px;">+</span>
                    </label>
                </div>
            </v-col>
            <v-col cols="12">
                <v-text-field v-model="dataString.name" variant="outlined" label="Enter Service Name" hide-details></v-text-field>
            </v-col>
           
            <v-col cols="6">
                <v-text-field v-model="dataString.phone" variant="outlined"
                    label="Enter phone"  hide-details></v-text-field>
            </v-col>
            <v-col cols="6">
                <v-text-field v-model="dataString.email" variant="outlined" label="Enter email" hide-details></v-text-field>
            </v-col>
            <v-col cols="12">
                <v-text-field v-model="dataString.password" variant="outlined" label="Enter password" hide-details></v-text-field>
            </v-col>
            
            <v-col cols="12">
                <v-btn  color="#233044" variant="flat" @click="saveDate" block class="text-none">Save</v-btn>
            </v-col>

        </v-row>

    </v-navigation-drawer>
</template>
<script>
export default {
    props: ['profile'],
    data: () => ({
        drawer: false,
        headers: [
            { title: 'Contact', align: 'start', value: 'name' },
            { title: 'phone', align: 'start', value: 'phone' },
            { title: 'email', align: 'start', value: 'email' },
            { title: 'Status', align: 'end', value: 'status' },
            { title: 'Date', align: 'end', value: 'created_at' },
            { title: 'Manage', align: 'end', value: 'actions' },
        ],
        itemsPerPage: 10,
        search: '',
        serverItems: [],
        loading: true,
        totalItems: 0,

        dataString: {
            name: null,
            image: null,
            phone: null,
            email: null,
            role: 'partner',
            status: 1,
            password: null,
        },
    }),
    methods: {
      
        async saveDate() {
            axios.post("/add-partner", this.dataString)
                .then((response) => {
                    console.log(response.data);
                    this.loadItems({ page: 1, itemsPerPage: 10, sortBy: 'name' })
                    this.drawer = false;
                }).catch((e) => { });
        },
        async fileUpload() {

            const image = this.$refs.image.files[0];
            let formData = new FormData();
            formData.append("file", image);

            const config = {
                onUploadProgress: function (progressEvent) {
                    var percentCompleted = Math.round(
                        (progressEvent.loaded * 100) / progressEvent.total
                    );
                },
            };

            axios.post("/uploadfiles?directory=category", formData, config)
                .then((response) => {
                    this.dataString.image = response.data.imageUrl;
                }).catch((e) => { });
        },

        async removeImge() {
            this.dataString.image = null;
        },
        convertDateFormat(inputDate) {

            const parsedDate = new Date(inputDate);
            if (isNaN(parsedDate)) {
                return "Invalid Date";
            }
            const day = parsedDate.getDate();
            const month = parsedDate.toLocaleString('default', { month: 'short' });
            const year = parsedDate.getFullYear();
            let hours = parsedDate.getHours();
            const minutes = parsedDate.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Handle midnight (0 hours)
            const formattedHours = hours < 10 ? '0' + hours : hours;
            const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
            const formattedDate = `${day} ${month} ${year}`;
            return formattedDate;

        },

        loadItems({ page, itemsPerPage, sortBy }) {

            axios.get('/getPartner', {
                params: {
                    per_page: itemsPerPage,
                    page: page,
                }
            })
                .then(response => {
                    console.log(response.data);
                    this.serverItems = response.data.data;
                    this.totalItems = response.data.total;
                    this.loading = false
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

        },
    }
    ,
    mounted() {
    }
}
</script>