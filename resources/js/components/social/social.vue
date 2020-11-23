<template>
    <div>
        <post @new="pushStatus"/>
        <status :statuses="statuses"/>
    </div>
</template>

<script>
    import post from './post';
    import status from './status';
    import { ValidationProvider } from 'vee-validate';
    

    export default {
        components: {
            ValidationProvider
        },
        data() { 
            return { 
                statuses: {
                    type: [],
                    required: true
                },
                likes: {
                    type: Number,
                }
            }
        },
        mounted() {
            axios.get('/status')
            .then((response) => {
                this.statuses = response.data;
            });

        },
        methods: {
            pushStatus(status) {
                //this.statuses.push(status);
                axios.get('/status_with_user/'+status.id)
                      .then((response) => {
                        this.statuses.unshift(response.data);
                      })

            }
        },
        components: {post, status}
    }
</script>


<style>

</style>
