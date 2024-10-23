<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" color="#233044">
            <v-sheet class="px-3 py-5" color="primary">
                <h5 class="text-center mb-0">GlobalICD</h5>
            </v-sheet>
            <v-list density="compact" nav class="px-3">
                <v-list-item v-for="(item, i) in items" :key="i" :value="item" color="primary" :to="item.url">
                    <template v-slot:prepend>
                        <v-icon :icon="item.icon"></v-icon>
                    </template>
                    <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar class="elevation-0">
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-spacer></v-spacer>
            <v-menu nav density="compact">
                <template v-slot:activator="{ props }">
                    <v-btn color="grey-lighten-4" variant="flat" class="rounded-pill" v-bind="props"
                        prepend-icon="mdi-account-circle-outline" append-icon="mdi-chevron-down"
                        style="text-transform: none;">
                        <span class="d-none d-sm-block">{{ profile.name }}</span>
                    </v-btn>
                </template>
                <v-list nav density="compact">
                    
                    <v-list-item @click="logout">
                        <v-list-item-title title=""><v-icon>mdi-logout</v-icon> Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>

        <v-main class="bg-grey-lighten-5">
            <router-view :profile="profile" v-if="profile"></router-view>
        </v-main>
    </v-app>
</template>

<script>
import axios from 'axios';

export default {
    data: () => ({
        items: [
            { text: 'Dashboard', icon: 'mdi-home-variant-outline', url: '/dashboard/home' },
            //{ text: 'Certificates', icon: 'mdi-handshake-outline', url: '/dashboard/certificate' },
        ],
        drawer: null,
        profile: [],
    }),

    methods:
    {
        async logout() {
            localStorage.removeItem('_uid');
            this.$router.push('/login')
        },

    },
    created() {
        const _uid = localStorage.getItem('_uid')
        if (_uid) {
            axios.post('/authcheck', { token: _uid }).then(response => {
                if (response.data.status == 200) {
                    this.profile = response.data.profile;
                }
                else {
                    this.$router.push('/login')
                }
            })
        } else {
            this.$router.push('/login')
        }


    }
}
</script>