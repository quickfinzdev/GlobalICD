<template>
    <v-sheet class="bg-blue-lighten-5 pa-12" rounded style="height: 100vh;">
        <v-card class="mx-auto px-6 py-8 mt-15" max-width="344">
            <h4 class="text-center roboto-regular mb-6">Admin <strong>Login</strong></h4>
            <v-form v-model="form" @submit.prevent="onSubmit">

                <v-text-field v-model="email" :readonly="loading" :rules="[required]" class="mb-2" label="Email"
                    clearable variant="outlined"></v-text-field>
                <v-text-field v-model="password" :readonly="loading" :rules="[required]" label="Password"
                    placeholder="Enter your password" clearable variant="outlined"></v-text-field>

                <v-btn :disabled="!form" :loading="loading" color="#233044" size="large" type="submit"
                    variant="elevated" block>
                    Sign In
                </v-btn>
            </v-form>
        </v-card>
    </v-sheet>

    <v-snackbar v-model="snackbar" multi-line>
        Invalid email or password
        <template v-slot:actions>
            <v-btn color="red" variant="text" @click="snackbar = false">
                Close
            </v-btn>
        </template>
    </v-snackbar>
</template>

<script>
export default {
    data: () => ({
        snackbar:false,
        form: false,
        email: null,
        password: null,
        loading: false,
    }),

    methods: {
        onSubmit() {
            if (!this.form) return

            this.loading = true

            axios.post('/auth', { email: this.email, password: this.password }).then(response => {
                if (response.data.status == 200) {
                    setTimeout(() => {
                        this.$router.push('/dashboard/home')
                        this.loading = false;
                       
                        localStorage.setItem('_uid', response.data.token)
                    }, 2000)
                } else {
                    this.snackbar = true;
                    this.loading = false
                }
            })



        },
        required(v) {
            return !!v || 'Field is required'
        },
    },
}
</script>