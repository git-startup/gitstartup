<template>
    <div class="conversation">
        <h1 class="w3-right-align" id="contact_name">{{ contact ? contact.name : '' }}</h1>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
    import MessagesFeed from './MessagesFeed';
    import MessageComposer from './MessageComposer';

    export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }

                axios.post('/conversation/send', {
                    contact_id: this.contact.id,
                    text: text,
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }).then((response) => {
                    this.$emit('new', response.data);
                })
            }
        },
        components: {MessagesFeed, MessageComposer}
    }
</script>

<style lang="scss" scoped>
.conversation {
    background-color: #fff;
    width: 100%;
    height: 100%;
    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
    }
}
@media screen and (max-width: 768px){
    .conversation {

    }
}
</style>
