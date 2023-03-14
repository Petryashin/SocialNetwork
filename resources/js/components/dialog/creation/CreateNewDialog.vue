<template>
    <div>
        <div class="create-dialog-window">
            <textarea placeholder="Find" v-model="fullName" class="create-dialog-area"></textarea>
        </div>
        <ul>
            <li v-for="user in availableUsers"
                :key="user.id"
                v-if="showAvailable"
                @click.stop="createNewChat(user)"
                class="proposed-user">
                {{ user.name }}
            </li>
        </ul>

    </div>
</template>

<script>
export default {
    name: "CreateNewDialog",
    data() {
        return {
            findText: "",
            availableUsers: {},
            timerId: null,
            showAvailable: false
        }
    },
    methods: {
        async getAllowUsers(name) {
            await this.$store.dispatch("users/getAvailableUsers", name)
            this.availableUsers = this.$store.getters["users/getUsers"]
            this.showAvailable = true
        },
        resetTimer() {
            clearTimeout(this.timerId)
        },
        async createNewChat(proposeUser) {
            this.showAvailable = false

            await this.$store.dispatch("chats/createNewChatWithUser", proposeUser)

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

                this.findText = newValue
                if (this.findText.length > 0) {
                    this.timerId = setTimeout(() => this.getAllowUsers(newValue), 2000)
                }
            }
        }
    }
}
</script>

<style scoped>
.create-dialog-area {
    width: 89%;
    height: 51%;
    margin: 3px 0px;
    border-radius: 15px;
    background-color: #39383dd9;
    opacity: 0.5;
    padding: 0px -4px;
    vertical-align: middle;
    text-align: center;
}

.proposed-user:hover {
    opacity: 0.8;
    color: red;
}

.proposed-user:hover {
    opacity: 0.8;
    color: #0dcaf0;
}
</style>
