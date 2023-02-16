<template>
    <li class="create-dialog-window">
        <textarea placeholder="Find" v-model="fullName" class="create-dialog-area"></textarea>
    </li>
</template>

<script>
export default {
    name: "CreateNewDialog",
    data() {
        return {
            findText: "",
            availableUsers: {},
            timerId: null
        }
    },
    methods:{
        getAllowUsers(){
            this.$store.dispatch("users/getAvailableUsers")
        },
        resetTimer(){
            clearTimeout(this.timerId)
        }
    },
    computed: {
        fullName: {
            // getter
            get() {
                console.log("sas")
                return this.findText
            },
            // setter
            set(newValue) {
                this.resetTimer()

                this.timerId = setTimeout(this.getAllowUsers,2000)
            }
        }
    }
}
</script>

<style scoped>
.create-dialog-area{
    width: 86%;
    height: 55%;
    margin: auto;
    border-radius: 15px;
    background-color: #39383dd9;
    opacity: 0.5;
    padding: 0px 10px;
    vertical-align: middle;
}
</style>
