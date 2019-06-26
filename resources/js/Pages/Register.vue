<template>
    <v-container mt-5 md9>
        <v-layout justify-center>
            <v-flex sm6>
                <v-alert
                    v-model="errors"
                    type="error"
                    v-for=" error in errors"
                    dismissible
                    icon="warning"
                    :key="guid()"
                >
                    {{error}}
                </v-alert>
                <v-card hover>
                    <v-card-title offset-md2>
                        <h3 class="headline">Register</h3>
                    </v-card-title>
                    <v-flex>
                        <v-form
                            ref="form"
                            v-model="valid"
                            lazy-validation
                            @submit.prevent="register()">
                            <v-card-text>
                                <v-text-field
                                    label="Name"
                                    type="text"
                                    v-model="form.name"
                                    :rules="[() => !!form.name || 'This field is required']"
                                    prepend-inner-icon="person"
                                    solo
                                >
                                </v-text-field>
                                <v-text-field
                                    label="Email"
                                    v-model="form.email"
                                    :rules="[() => !! form.email || 'This field is required']"
                                    prepend-inner-icon="email"
                                    solo
                                >
                                </v-text-field>
                                <v-text-field
                                    label="Password"
                                    :type="show1 ? 'text' : 'password'"
                                    :append-icon="show1 ? 'visibility' : 'visibility_off'"
                                    @click:append="show1 = !show1"
                                    v-model="form.password"
                                    prepend-inner-icon="lock"
                                    solo
                                    :rules="[() => !! form.password || 'This field is required']"

                                >
                                </v-text-field>

                                <v-text-field
                                    v-model="form.confirmPassword"
                                    label="Comfirm Password"
                                    :type="show2 ? 'text' : 'password'"
                                    :append-icon="show2 ? 'visibility' : 'visibility_off'"
                                    @click:append="show2 = !show2"
                                    prepend-inner-icon="lock"
                                    solo
                                    :rules="[() => !! form.password || 'This field is required']"

                                >
                                </v-text-field>

                                <v-switch label="Agree Terms and Condition ?">
                                </v-switch>
                                <v-flex offset-md3>
                                    <v-btn type='submit' color="primary">Register</v-btn>
                                    <v-btn color="error">Cancel</v-btn>
                                </v-flex>
                            </v-card-text>

                        </v-form>
                    </v-flex>
                </v-card>
            </v-flex>
        </v-layout>
    </v-container>

</template>


<script>
    export default {
        name: "Register",
        data() {
            return {
                valid: true,
                show1: false,
                show2: false,
                form: {
                    name: '',
                    email: '',
                    password: '',
                    confirmPassword: ''

                },
                errors: {}
            }
        },
        created() {
           if(User.logedIn()){
               this.$router.push({
                   name:'blog'
               });
           }
        },

        methods: {
            register() {
                if (this.$refs.form.validate()) {
                    axios.post('api/v1/auth/register', this.form)
                        .then(response => console.log(response.data))
                        .catch(error => this.errors = error.response.data.errors);
                }
            },
        }

    }
</script>

