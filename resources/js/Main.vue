<template>
    <v-app id="inspire">
        <v-app-bar flat>
            <v-container class="mx-auto d-flex align-center justify-center" style="max-width: 1350px;">
                <h2 class="mb-0">GlobalICD </h2>
                <v-spacer></v-spacer>
                <v-btn v-for="link in links" :key="link" :text="link" variant="text"></v-btn>
            </v-container>
        </v-app-bar>

        <v-main class="bg-white">

            <v-carousel hide-delimiters show-arrows="hover" height="auto">
                <v-carousel-item v-for="(item, i) in items" :key="i" :src="item.src" cover></v-carousel-item>
            </v-carousel>

            <v-container style="max-width: 1350px;">
                <v-row class="py-10">
                    <v-col cols="12">
                        <h2 class="text-center font-weight-bold">Compliance Certificates</h2>
                    </v-col>
                    <v-col cols="6" md="2">
                        <v-card class="rounded-lg">
                            <v-card-text class="text-center">
                                <h5 class="font-weight-bold">ISO 9001:2015</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="6" md="2">
                        <v-card class="rounded-lg">
                            <v-card-text class="text-center">
                                <h5 class="font-weight-bold">WHO GMP</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="6" md="2">
                        <v-card class="rounded-lg">
                            <v-card-text class="text-center">
                                <h5 class="font-weight-bold">CE</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col cols="6" md="2" class="text-center">
                        <v-card class="rounded-lg">
                            <v-card-text>
                                <h5 class="font-weight-bold">ISO 22000</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="6" md="2">
                        <v-card class="rounded-lg">
                            <v-card-text class="text-center">
                                <h5 class="font-weight-bold">ISO 9001</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="6" md="2">
                        <v-card class="rounded-lg">
                            <v-card-text class="text-center">
                                <h5 class="font-weight-bold">ISO 140001</h5>
                                <p>GMP stands for Good Manufacturing Practice</p>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
            <v-sheet class="mt-15 px-4 px-sm-0">
                <v-row class="align-center" style="background-color: #e8f8ff;">
                    <v-col cols="12" md="6 py-0 mt-3 mt-sm-0">
                        <v-img src="https://cnrservices.in/images/side-image02.jpg"></v-img>
                    </v-col>
                    <v-col cols="12" md="6  py-0" >
                        <div class="py-5" style="max-width: 600px; margin:auto;">
                            <h2>About Us</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </v-col>
                </v-row>
            </v-sheet>

            <v-container class="py-15" style="max-width: 1350px;">
                <v-row class="align-center py-15">
                    <v-col cols="12" md="5">
                        <h3>Get ISO Certification</h3>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </v-col>
                    <v-col cols="12" md="7">
                        <v-row>
                            <v-col cols="6" md="3">
                                <v-img src="https://cnrservices.in/images/image05.jpg"></v-img>
                            </v-col>
                            <v-col cols="6" md="3">
                                <v-img src="https://cnrservices.in/images/image05.jpg"></v-img>
                            </v-col>
                            <v-col cols="6" md="3">
                                <v-img src="https://cnrservices.in/images/image05.jpg"></v-img>
                            </v-col>
                            <v-col cols="6" md="3">
                                <v-img src="https://cnrservices.in/images/image05.jpg"></v-img>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-container>

            <v-sheet style="background-color: #e8f8ff;" class="py-5">
                <v-container style="max-width: 1350px;">
                    <v-row>
                        <v-col cols="12" md="5 text-center mx-auto">
                            <h2>Request Form</h2>
                            <p>If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
                        </v-col>
                        <v-col cols="12" md="8 mx-auto">
                            <v-card class="rounded-lg elevation-0">
                                <v-card-text>
                                    <v-row>
                                        <v-col cols="12" md="6">
                                            <v-text-field variant="outlined" hide-details label="Enter Full Name"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" md="6">
                                            <v-text-field variant="outlined" hide-details label="Enter Email"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" md="6">
                                            <v-text-field variant="outlined" hide-details label="Enter Phone Number"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" md="6">
                                            <v-autocomplete variant="outlined" hide-details label="Looking For*" :items="['ISO 9001:2015', 'WHO GMP', 'CE', 'Halal', 'ISO 22000', 'ISO 9001', 'ISO 140001']"></v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" md="12">
                                            <v-textarea variant="outlined" hide-details label="Enter Your Message.*" ></v-textarea>
                                        </v-col>
                                        <v-col cols="12" md="6 mx-auto">
                                            <v-btn class="text-none" block color="primary" size="large">Submit</v-btn>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </v-sheet>
        </v-main>
        <v-footer>
            <v-container style="max-width: 1350px;">
                <v-row>
                    <v-col cols="12" md="6">
                        <h2>Logo</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    </v-col>
                    <v-col cols="12" md="3">
                        <h5>Help</h5>
                        <p class="mb-0"><router-link class="text-decoration-none text-dark" to="/">Terms & Condition</router-link></p>
                        <p class="mb-0"><router-link class="text-decoration-none text-dark" to="/">Privacy Policy</router-link></p>
                    </v-col>
                    <v-col cols="12" md="3">
                        <h5>Address</h5>
                       <p> <v-icon>mdi-map-marker</v-icon> RA - 423, Salt Lake Bypass, Nabapally, Sector IV, Bidhannagar, Kolkata, West Bengal KOL-05</p>
                       <p> <v-icon>mdi-phone</v-icon> +91 9878987698</p>
                       <p> <v-icon>mdi-email</v-icon> contact@catelogue.com</p>
                    </v-col>
                </v-row>
            </v-container>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    data: () => ({
        items: [
            {
                src: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJDouWgXLyRT_e8BIDc_8R-IUOGSqnhL-xzvGJ1cLTS4pOTwliMAwXQIZ1SuDx4M3dmis&usqp=CAU',
            },
            {
                src: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJDouWgXLyRT_e8BIDc_8R-IUOGSqnhL-xzvGJ1cLTS4pOTwliMAwXQIZ1SuDx4M3dmis&usqp=CAU',
            },
            {
                src: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJDouWgXLyRT_e8BIDc_8R-IUOGSqnhL-xzvGJ1cLTS4pOTwliMAwXQIZ1SuDx4M3dmis&usqp=CAU',
            },
            {
                src: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJDouWgXLyRT_e8BIDc_8R-IUOGSqnhL-xzvGJ1cLTS4pOTwliMAwXQIZ1SuDx4M3dmis&usqp=CAU',
            },
        ],
        links: [
            '+919887988787',
        ],
    }),
}
</script>