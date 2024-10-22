<template>
    <v-container style="max-width: 1350px;" class="pt-12">

        <v-row>
            <v-col cols="12 d-flex align-center">
                <v-btn variant="outlined" class="text-none mr-2 rounded-lg" style="min-width: 10px;max-width: 10px;"
                    to="/dashboard/home"><v-icon>mdi-arrow-left-top</v-icon></v-btn>
                <div class="ml-4">
                    <h3 class="mb-0 roboto-thin" style="font-size: 1.5rem;  font-weight: 600; line-height: 1.25;">
                        Certificate</h3>
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
                <v-btn class="text-none" color="#233044" variant="flat" @click="drawer = true"><i
                        class="bi bi-plus"></i>
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
                                    <v-btn prepend-icon="mdi-eye" @click="view(item)"
                                        color="blue-lighten-4" class="elevation-0 mr-1" size="small"
                                        style="text-transform: none;">View</v-btn>

                                    <v-menu density="compact" size="">
                                        <template v-slot:activator="{ props }">
                                            <v-btn v-bind="props" size="small" variant="flat" color="grey-lighten-5"
                                                style="min-width: none;min-width: 8px; padding: 0px;"><v-icon
                                                    style="font-size: 22px;">mdi-chevron-down</v-icon></v-btn>
                                        </template>
                                        <v-list density="compact" size="x-small" nav>
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
        temporary width="600">
        <v-row class="pa-10">
            <v-col cols="12 d-flex align-center">
                <v-btn variant="outlined" class="text-none mr-2 rounded-lg" style="min-width: 10px;max-width: 10px;"
                    @click="drawer = false"><v-icon>mdi-arrow-left-top</v-icon></v-btn>
                <div class="ml-4">
                    <h5 class="mb-0">Certificate Details</h5>
                </div>
            </v-col>
            <!--<v-col cols="12">
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
            </v-col>-->
            <v-col cols="12">
                <v-text-field v-model="dataString.organization" variant="outlined" label="Name of Organization"
                    hide-details></v-text-field>
            </v-col>


            <v-col cols="12">
                <v-text-field v-model="dataString.address" variant="outlined" label="Address"
                    hide-details></v-text-field>
            </v-col>
            <v-col cols="6">
                <v-text-field v-model="dataString.mobile" variant="outlined" label="Mobile" hide-details></v-text-field>
            </v-col>

            <v-col cols="6">
                <v-text-field v-model="dataString.email" variant="outlined" label="Email" hide-details></v-text-field>
            </v-col>

            <v-col cols="6">
                <v-text-field v-model="dataString.certificate_type" variant="outlined" label="Type of Certification"
                    hide-details></v-text-field>
            </v-col>

            <v-col cols="6">
                <v-text-field v-model="dataString.certificate_no" variant="outlined" label="Certificate No"
                    hide-details></v-text-field>
            </v-col>

            <v-col cols="6">
                <v-text-field v-model="dataString.issue_date" variant="outlined" label="Issue Date"
                    hide-details></v-text-field>
            </v-col>

            <v-col cols="6">
                <v-text-field v-model="dataString.expiry_date" variant="outlined" label="Expiry date"
                    hide-details></v-text-field>
            </v-col>


            <v-col cols="6">
                <v-text-field v-model="dataString.f_s_date" variant="outlined" label="1st Surveillance date"
                    hide-details></v-text-field>
            </v-col>

            <v-col cols="6 ">
                <v-text-field v-model="dataString.s_s_date" variant="outlined" label="2nd Surveiilance date"
                    hide-details></v-text-field>
            </v-col>

            <v-col cols="12">
                <v-btn color="#233044" variant="flat" @click="saveDate" block class="text-none">Save</v-btn>
            </v-col>

        </v-row>

    </v-navigation-drawer>



    <v-dialog v-model="dialog" max-width="800">
        <v-card>
            <v-card-text>
                <div ref="pdfContent" id="content">
                    <div style="padding: 10px;">
                        <div style="border: 2px solid #8e677a; padding: 3px;">
                            <div style="border: 1px solid #ccc; padding: 3px 20px;  background:#8e677a;">
                                <div style="padding: 30px;background:#fff; border-radius:50px;">
                                    <div class="text-center">
                                        <v-img src="/images/logo1.png"
                                            style="max-width: 140px; display:block; margin:auto;"></v-img>
                                        <h1 style="color: #2d4c81; text-transform:uppercase; font-weight:bold; margin-top:10px; font-size:30px;">
                                            International Certificate Desk</h1>
                                        <h2 style="color: #cf1d31;   font-family: 'Jacquard 24', system-ui; font-size:40px;"> Certificate of Registration</h2>
                                        <h2 style="color: #32506f;">The Quality Management System of
                                        </h2>
                                        <h1
                                        style="color: #000; text-transform:uppercase; font-weight:bold; margin-top:20px;">
                                        Budget System</h1>
                                        <div
                                            style="background-image: url('/images/logo2.png');background-size: 78%; background-position: center; padding: 35px 0;">
                                           
                                            <h4 style="color: #010101;">{{dataString.address}}</h4>
                                            <h4 style="color: #234478;">has been assessed and complies
                                                with
                                                the requirements of</h4>
                                            <h1 style="color: #234478; font-weight:bold;">ISO 9001:2015
                                            </h1>
                                            <h4 style="color: #234478;">For the following Scope</h4>
                                            <h4 style="color: #0e0e0e;">Providing pocket friendly
                                                fitness
                                                solution to all & Promoting new fitness center of franchise mode.</h4>
                                        </div>
                                    </div>
                                    <div style="display: flex;" class="justify-content-between">
                                        <div>
                                            <div style="display: flex;  font-size:17px;">
                                                <div style="color: #234479;" class="mr-2">Certificate No:</div>
                                                <div style="font-weight: bold;"> {{dataString.certificate_no}}</div>
                                            </div>
                                            <div style="display: flex;  font-size:17px;">
                                                <div style="color: #234479;" class="mr-2">issue Date:</div>
                                                <div style="font-weight: bold;"> {{convertDateFormat(dataString.issue_date)}}</div>
                                            </div>
                                            <div style="display: flex;  font-size:17px;">
                                                <div style="color: #234479;" class="mr-2">Expiry Date:</div>
                                                <div style="font-weight: bold;"> {{convertDateFormat(dataString.expiry_date)}}</div>
                                            </div>
                                            <div style="display: flex;  font-size:17px;">
                                                <div style="color: #234479;" class="mr-2">1st Surveillance (on or before):</div>
                                                <div style="font-weight: bold;"> {{convertDateFormat(dataString.f_s_date)}}</div>
                                            </div>
                                            <div style="display: flex;  font-size:17px;">
                                                <div style="color: #234479;" class="mr-2">2nd Surveillance (on or before):</div>
                                                <div style="font-weight: bold;"> {{convertDateFormat(dataString.s_s_date)}}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <v-img src="/images/iso.png" style="width: 150px;"></v-img>
                                        </div>
                                    </div>
                                    <div style="padding: 10px 0; " class="text-center">
                                        <p style="color: #234479;" class="mb-0">This certificate is granted after
                                            satisfactory
                                            surveillance
                                            on
                                            limited sampling audit as per ISO standard and will remain valid for 3 years
                                            from
                                            the
                                            date of issue where it is subject to maintenance of standards by the issued
                                            body.
                                            International Certification Desk will not remain responsible for client's
                                            failure to
                                            maintain documented quality system.</p>
                                    </div>
                                    <div style="display: flex;" class="py-1">
                                        <v-img src="/images/signature.png" style="max-width: 100%;"></v-img>
                                    </div>
                                    <div class="text-center mt-2">
                                        <p class="mb-0" style="color: #234479; ">61 Centre Street, New
                                            York,
                                            NY 1007, USA, www.icdesk.com,
                                            usa@icdesk.com
                                        </p>
                                        <p style=" color: #234479; font-size:11px">This certificate is property of
                                            International
                                            Certification
                                            Desk
                                            LLC and shall be returned immediately on request.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button @click="generatePDF">Download as PDF</button>
            </v-card-text>
        </v-card>
    </v-dialog>


</template>
<script>

import html2pdf from 'html2pdf.js';

export default {
    props: ['profile'],
    data: () => ({
        dialog: false,
        drawer: false,
        headers: [
            { title: 'Organization', align: 'start', value: 'organization' },
            { title: 'certificate_type', align: 'start', value: 'certificate_type' },
            { title: 'mobile', align: 'start', value: 'mobile' },
            { title: 'certificate_no', align: 'end', value: 'certificate_no' },
            { title: 'issue_date', align: 'end', value: 'issue_date' },
            { title: 'expiry_date', align: 'end', value: 'expiry_date' },
            { title: 'Date', align: 'end', value: 'created_at' },
            { title: 'Manage', align: 'end', value: 'actions' },
        ],
        itemsPerPage: 10,
        search: '',
        serverItems: [],
        loading: true,
        totalItems: 0,

        dataString: {
            organization: null,
            certificate_type: null,
            address: null,
            mobile: null,
            email: null,
            certificate_no: null,
            issue_date: null,
            expiry_date: null,
            f_s_date: null,
            s_s_date: null,
        },
    }),
    methods: {
        view(item){
            this.dialog = true;
            this.dataString = item;
        },
        generatePDF() {
            const element = this.$refs.pdfContent;
            const options = {
                margin: 0.5, // Adjust the margin as needed (in inches)
                filename: 'document.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' } // A4 size specified here
            };

            html2pdf().from(element).set(options).save();
        },
        async saveDate() {
            axios.post("/add-iso", this.dataString)
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

            axios.get('/getIos', {
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