<template>
    <v-container grid-list-sm>
        <v-layout row wrap>
            <v-progress-circular v-if="loading"
                                 :size="100"
                                 color="primary"
                                 class="mt-auto"
                                 indeterminate
            ></v-progress-circular>
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
                                hover
                                flat>

                                <v-card-title
                                    text-center class="headline">
                                    {{question.title}}
                                </v-card-title>
                                <v-card-text>
                                    {{question.body}}
                                </v-card-text>
                                <v-card-actions>

                                    <v-btn flat icon color="blue lighten-2" @click.prevent="StatusLiked">
                                        <v-icon>thumb_up</v-icon>
                                    </v-btn>
                                    <v-btn flat icon color="red lighten-2">
                                        <v-icon>thumb_down</v-icon>
                                    </v-btn>
                                    <v-spacer></v-spacer>
                                    <v-icon large color="green darken-1">chat</v-icon>


                                </v-card-actions>
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

    export default {
        name: "Forum",
        components: {
            CategoryList
        },
        data() {
            return {
                loading: true,
                questions: [],

            }

        },
        created() {

            this.getQuestion();
            this.loading = false;
        },
        methods: {
            getQuestion() {
                axios.get('api/v1/question')
                    .then(response => {
                        this.questions = response.data.data;
                    })
                    .catch(error => console.log(error.data))
            },
            StatusLiked() {
                axios.post('api/v1/like')
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => {
                        console.log(err)

                    })
            }


        }
    }
</script>

<style scoped>
    .category {
        height: 30px;
        text-align: center;
        text-decoration: none;
    }

    .category-title {
        text-align: center;
        text-decoration: none;
    }
</style>
