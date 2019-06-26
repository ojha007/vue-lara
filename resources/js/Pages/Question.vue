<template>
    <v-container
        mt-5
    >
        <v-layout justify-center>
            <v-flex md9 sm9>
                <v-alert
                    :value="alert"
                    dismissible
                    type="warning"
                    mb2
                >
                    {{errorMessage}}
                </v-alert>
                <v-card hover>

                    <v-card-title xs12 sm6 md6
                                  class="headline justify-center"

                    >
                        Ask Your Question Here ?
                    </v-card-title>
                    <v-spacer></v-spacer>
                    <v-form
                        v-model="valid"
                        lazy-validation
                        ref="form"
                        @submit.prevent="storeQuestion">
                        <v-container>

                            <v-layout
                                wrap
                                align-center
                                justify-center
                                row
                                fill-height>
                                <v-flex xs12 sm9 d-flex>
                                    <v-text-field
                                        solo
                                        v-model="form.title"
                                        label="Title"
                                        required
                                        :rules="titleRules"
                                        counter
                                        maxlength="90"
                                    ></v-text-field>
                                </v-flex>
                            </v-layout>

                            <v-layout
                                wrap

                                align-center
                                justify-center
                                row
                                fill-height>
                                <v-flex xs12 sm9 d-flex>
                                    <v-select
                                        solo
                                        v-model="form.category_id"
                                        label="Select Category"
                                        :items="categories"
                                        item-text="title" item-value="id"
                                    >
                                    </v-select>

                                </v-flex>
                            </v-layout>
                            <v-layout

                                wrap
                                align-center
                                justify-center
                                row
                                fill-height
                            >
                                <v-flex xs12 sm9 d-flex>
                                    <v-textarea
                                        solo
                                        auto-grow
                                        v-model="form.body"
                                         name="body"
                                        label="More detail about question ?"
                                    ></v-textarea>
                                </v-flex>
                            </v-layout>
                            <v-layout
                                wrap
                                align-center
                                justify-center
                                row
                                fill-height>
                                <v-flex xs12 sm9 d-flex>

                                    <v-btn round color="success" type="submit">Submit</v-btn>
                                    <v-btn round color="error" type="clear">Clear</v-btn>

                                </v-flex>
                            </v-layout>


                        </v-container>

                    </v-form>
                </v-card>

            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>

    import Storage from "../helpers/Storage";

    export default {
        name: "Question",
        data() {
            return {
                errorMessage: {},
                alert: false,
                valid: true,
                categories: [],
                form: {
                    title: '',
                    category_id: '',
                    body: '',
                    token: Storage.getToken(),
                },
                titleRules: [
                    v => !!v || 'Title is required',
                    v => (v && v.length <= 90) || 'Title must be less than 90 characters'
                ],

            }


        },
        created() {
            if (!User.logedIn()) {
                this.$router.push({
                    name: 'Login'
                });

            }

        },
        mounted() {
            axios.get('api/v1/category')
                .then((response) => {
                    this.categories = response.data.data;
                })
                .catch(error => {
                    this.errored = true;
                })
        },

        methods: {

            storeQuestion() {
                axios.post('api/v1/question', this.form)
                    .then(res => {
                        this.alert = true;
                        this.errorMessage = res.data.error;
                        if(res.data.message){
                            this.$router.push({
                                name: 'forum'
                            });

                        }
                    })
                    .catch(error => {
                        this.alert = true;
                        this.errorMessage= error;
                        console.log(error)


                    });

            }
        }
    }
</script>

<style scoped>

</style>
