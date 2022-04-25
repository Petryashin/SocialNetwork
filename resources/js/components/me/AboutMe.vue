<template>
  <div class="root_about_me">
    <div class="hat_component">
      <div class="main_image_component">
        <div class="custom-file">
          <img v-if="infos.photo" src="/api/user/photo/1" style="width: 80%" />
          <input
            type="file"
            id="customFile"
            @change="fileInputChange($event)"
          />
        </div>
      </div>
      <div class="main_info_component">
        <div style="margin: 8px" class="header_info">
          Личная информация: <span @click="editInfo">Редактировать</span>
        </div>
        <table v-if="!edit">
          <tr v-if="checkKey(key)" v-for="(info, key) in infos" :key="key" class="string_info">
            <td>{{ key }}</td>
            <td>{{ info ? info : "" }}</td>
          </tr>
        </table>
        <table v-if="edit">
          <tr v-if="checkKey(key)" v-for="(info, key) in infos" :key="`_${key}`" class="string_info">
            <td>{{ key }}</td>
            <td><input type="text" v-model="infos[key]" /></td>
          </tr>
          <input
            type="button"
            @click="saveChanges"
            value="Сохранить изменения"
          />
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      infos: null,
      edit: false,
    };
  },
  created() {
    this.$store.dispatch("user/getUser");
  },
  mounted() {
    this.getInfo();
  },

  methods: {
    checkKey(key) {
      return key !== 'photo'
    },
    getInfo() {
      setTimeout(
        () =>
          {let userId = this.$store.getters["user/getUserId"];
          this.$api
            .get(`/api/user/info/${userId}`)
            .then((response) => (this.infos = response.data.user))
            },
        1000
      );
    },

    editInfo() {
      this.edit = true;
    },

    saveChanges() {
      this.$api.put("/api/user/info/1", this.infos).then((response) => {
        console.log(response.data);
        this.edit = false;
      });
    },

    fileInputChange(event) {
      this.infos.photo = null;

      let file = event.target.files[0];
      let form = new FormData();

      form.append("image", file);

      axios.post("/api/user/photo/1", form).then((response) => {
        console.log(response);
        this.infos.photo = response.data.filepath;
      });
    },
  },
};

</script>
<style scoped>
.hat_component {
  display: flex;
  flex-direction: row;
}
.main_image_component {
  margin: 5px;
  min-width: 30%;
  min-height: 30%;
  max-width: 30%;
  max-height: 40%;
  display: flex;
  flex-direction: column;
}
.main_info_component {
  display: flex;
  flex-direction: column;
  gap: 5px;
  font-size: 14px;
  margin: 8px 8px;
}
.field_info {
  display: flex;
  flex-direction: row;
}
table {
  border-spacing: 10px 0px;
  border-collapse: separate;
}
</style>
