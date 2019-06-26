<template>
    <v-container grid-list-sm>
        <v-layout row wrap>

            <v-flex md9
                    xs12
                    sm9>
                <v-flex
                    v-for="question in questions"
                    :key="question.id"
                    d-flex
                >
                    <v-layout row wrap>
                        <v-flex d-flex hover>
                            <v-card
                                tile
                                flat>
                                <v-card-title
                                    text-center class="headline">
                                    {{question.title}}
                                </v-card-title>
                                <v-card-text>
                                    {{question.body}}
                                </v-card-text>
                                <v-expansion-panel
                                >
                                    <v-expansion-panel-content class="container">
                                        <div slot="header" class="headline"
                                             @click="getReplies(question.slug,question.id)"
                                        >
                                            Leave A Comment
                                        </div>
                                        <v-flex>
                                            <v-card
                                            >
                                                <div>
                                                    <v-flex v-for="reply in replies"
                                                            :key="reply.id"
                                                    >
                                                        <v-card
                                                            row
                                                            wrap
                                                        >
                                                            <v-card-title class="pa-4">
                                                                {{reply.body}}
                                                            </v-card-title>
                                                        </v-card>
                                                    </v-flex>
                                                </div>

                                            </v-card>
                                        </v-flex>
                                        <v-card>
                                            <v-flex mt-5>
                                                <v-alert
                                                    v-model="error"

                                                >
                                                    {{errorMessage}}
                                                </v-alert>
                                                <v-form>
                                                    <v-textarea
                                                        solo
                                                        v-model="form.title"
                                                        placeholder="Enter Your Comment Here ?"
                                                        required>
                                                    </v-textarea>
                                                </v-form>
                                            </v-flex>
                                        </v-card>
                                        <v-card-actions>
                                            <v-btn
                                                round color="success" dark
                                                @click.native="storeComment()">
                                                Comment
                                            </v-btn>
                                        </v-card-actions>

                                    </v-expansion-panel-content>
                                </v-expansion-panel>

                            </v-card>
                        </v-flex>
                    </v-layout>

                </v-flex>
            </v-flex>
            <category-list></category-list>
        </v-layout>
    </v-container>
</template>

<script>
    import CategoryList from "../layouts/category";
    import Comment from "../layouts/Comment";
    import Storage from "../helpers/Storage";

    export default {
        name: "SingleForum",
        components: {
            CategoryList,
            Comment
        },
        data() {
            return {
                selectedQuestion: null,
                questions: '',
                error: false,
                errorMessage: false,
                dialog: false,
                isModalVisible: false,
                form: {
                    title: ''
                }
            }

        },
        computed: {
            replies() {
                return this.$store.state.replies;
            },

        },

        created() {
            axios.get('/api/v1/question/category/' + this.$route.params.slug)
                .then((response) => {
                    this.questions = response.data;

                })
                .catch(error => {
                    console.log(error.data);
                    this.errored = true;
                });


        },
        methods: {

            getReplies(questionSlug, id) {
                this.selectedQuestion = id;
                this.$store.dispatch('fetchReplies', questionSlug);

            },

            storeComment() {
                axios.post('/api/v1/comment/question/' + this.selectedQuestion, {
                    title: this.form.title,
                    token: Storage.getToken(),
                    question_id: this.selectedQuestion
                })
                    .then(res => {
                        this.form.title = null;
                        if (res.data.error) {
                            this.errorMessage = res.data.error;
                            this.error = true;
                        }

                    })
                    .catch(error => {
                        console.log(error)


                    });

            }

        }


    }
</script>

<style scoped>

</style>
