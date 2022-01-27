import axios from "axios"

const messages = {
    namespaced: true, 
    state :{
        messages : null
    },
    mutations : {
        setMessages: (state, data) => state.messages = data
    },
    getters : {
        getMessages: (state) => state.messages
    }, 
    actions : {
        getMessages ({commit}) {
            axios.get("/api/dialog/messages").then(response => {
                commit("setMessages", response.data)
            })
        }
    }
}
export default messages