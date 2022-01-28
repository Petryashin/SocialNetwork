import axios from "axios"

const messages = {
    namespaced: true, 
    state :{
        messages : null
    },
    mutations : {
        setMessages: (state, data) => state.messages = data,
        setNewMessage: (state, message) => state.messages.push(message)
    },
    getters : {
        getMessages: (state) => state.messages
    }, 
    actions : {
        getMessages ({commit}) {
            this.$api.get("/api/dialog/messages").then(response => {
                commit("setMessages", response.data)
            })
        },
        sendMessage({commit,dispatch}, message) {
            // commit("setNewMessage",message)
            this.$api.put("/api/dialog/messages", message).then(response => {
                dispatch("getMessages")
                console.log(response)})

        }
    }
}
export default messages