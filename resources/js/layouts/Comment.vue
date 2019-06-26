<template>
    <v-layout row wrap>
        <v-dialog
            xs11
            sm5
            v-model="dialog"
            transition="dialog-up-transition"
            width="50%"
            scrollable
            origin="bottom"
        >
            <v-card>
                <v-toolbar dark>
                    <v-btn icon center @click.native="dialog = false" dark>
                        <v-icon>close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-flex>
                    <v-card
                    >
                        <div class="container">
                            <v-flex v-for="reply in replies"
                                    :key="reply.id"
                                    d-flex
                                    hover
                                    mb-2

                            >
                                <v-card>
                                    <v-card-title class="pa-4">
                                        {{reply.body}}
                                    </v-card-title>
                                </v-card>
                            </v-flex>
                        </div>
                        <v-card-text>
                            <v-flex xs12>
                                <v-textarea
                                    solo
                                    placeholder="Enter Your Comment Here ?"
                                    required>
                                </v-textarea>
                            </v-flex>
                        </v-card-text>
                        <v-card-actions>
                            <v-btn
                                round color="success" dark
                                @click.native="dialog = false">Comment
                            </v-btn>
                        </v-card-actions>

                    </v-card>
                </v-flex>

            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        name: "Comment",
        data() {
            return {
                isModalVisible: false,

            };
        },
        computed: {

            replies() {
                return this.$store.state.replies;
            }
        },

    };
</script>
