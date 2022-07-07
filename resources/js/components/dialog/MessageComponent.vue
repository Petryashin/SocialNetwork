<template>
    <div class="message" :class="itIsMe ? 'my-message' : ''">
        <div class="message-author">
            {{ itIsMe ? "Я" : message.user ? message.user.name : "" }}
        </div>
        <div class="message-content">
            <div>{{ message.text }}</div>
            <div>{{ getMessageTime(message.created_at)}}</div>
        </div>
    </div>
</template>
<script>
export default {
    name: "message-component",
    props: {
        message: "",
        userId: null,
    },
    methods : {
        getMessageTime(val){
            return moment(val).format('HH:mm')
        }
    },
    computed: {
        itIsMe() {
            return this.message?.user_id === this.userId;
        },
    },
};
</script>

<style scoped>
.message {
    text-align: justify;
    background-color: rgb(52 54 56);
    opacity: 0.81;
    min-width: 10%;
    max-width: 30%;
    padding: 8px 12px;
    border-radius: 10px;
    margin: 5px;
    margin-right: auto;
    box-shadow: 5px 8px 30px rgb(98 98 98 / 57%);
    border: 1px solid rgb(74 74 74 / 50%);
    word-wrap: break-word;
}

.my-message {
    text-align: justify;
    background-color: rgb(30 71 141);
    /* background-color: #5b4e4e; */

    margin-right: 5px;
    margin-left: auto;
}

.message-author {
    font-size: 14px;
    font-style: oblique;
}
</style>
