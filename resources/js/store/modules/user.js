const user = {
    namespaced: true, 
    state : {
        id: null,
    },
    mutations : {
        setUserid : (state,id) => state.id = id,
    },
    getters : {
        getUserId : (state) => state.id 
    }
}