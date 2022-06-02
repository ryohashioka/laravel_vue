<script setup lang="ts">
import { ref } from 'vue';
import axios from 'axios';

const message = ref("");
axios.get('/api/hello/laravelworld').then(res => {
  message.value = res.data;
})

// ユーザ取得
interface UserModel {
  id: number;
  name: string;
  email: string;
}
const name = ref<String>("");
const email = ref<String>("");
const password = ref<String>("");
const createUser = () => {
  if(name.value && email.value && password.value) {
    axios.post('/api/graphql', {
      query: `mutation {
        createUser(
          name:"${name.value}",
          email:"${email.value}", 
          password:"${password.value}"
        ) {
          id
        }
      }`,
    }).then(res => {
      if(res.data.errors) {
        message.value = "作成に失敗しました。";
        return;
      }
      message.value = "ユーザを作成しました。";
    })
  }
}
</script>

<template>
  <div>
    <div id="message">{{ message }}</div>
    <div style="padding-top: 1rem;">
      <div><label>name:</label><input type="text" v-model="name" /></div>
      <div><label>email:</label><input type="text" v-model="email" /></div>
      <div><label>password:</label><input type="password" v-model="password" /></div>
      <div class="mt-2 flex gap-5 justify-center">
        <button class="bg-blue-200 px-5 py-2 rounded-lg" @click="createUser">作成</button>
      </div>
    </div>
  </div>
</template>
