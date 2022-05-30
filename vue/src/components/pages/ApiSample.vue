<script setup lang="ts">
import { ref, watch } from 'vue';
import axios from 'axios';

const message = ref("");
axios.get('/api/hello/laravelworld').then(res => {
  message.value = res.data;
})

// 認証
const token = ref(sessionStorage.getItem('token') ?? "");
const email = ref("runolfsdottir.nolan@example.org");
const password = ref("password");
const login = () => {
  if(email.value && password.value) {
    axios.post('/api/graphql', {
      query: `mutation {
        login(
          email:"runolfsdottir.nolan@example.org", 
          password:"password"
        )
      }`,
    }).then(res => {
      token.value = res.data.data.login;
      sessionStorage.setItem('token', token.value);
    })
  }
}
const logout = () => {
  if(!token.value) return;
  axios.post('/api/graphql', {
    query: `mutation {
      logout
    }`,
  }, {
    headers: {
      Authorization: `Bearer ${token.value}`,
    },
  }).then(res => {
    token.value = "";
    sessionStorage.setItem('token', "");
  })
}

// ユーザ取得
interface UserModel {
  id: number;
  name: string;
  email: string;
}
const userId = ref("1");
const user = ref<UserModel>({
  id: 0, name: "", email: "",
});
const errMsg = ref("");
const getUser = (id: String|number) => {
  if(id) {
    errMsg.value = "";
    axios.post('/api/graphql', {
      query: `{
        user(id: ${id}) {
          id
          name
          email
        }
      }`,
    }, {
      headers: {
        Authorization: `Bearer ${token.value}`,
      },
    }).then(res => {
      if(res.data.errors) {
        let messages = res.data.errors.map((error: any) => error.message);
        errMsg.value = messages.join(' | ');
      }
      user.value = res.data.data.user ?? { id: 0, name: "", email: "" };
    })
  }
}
// getUser(1);
watch(userId, (id) => {
  getUser(id);
})
</script>

<template>
  <div>
    <div id="message">{{ message }}</div>
    <div style="padding-top: 1rem;">
      <div><label>email:</label><input type="text" v-model="email" /></div>
      <div><label>password:</label><input type="password" v-model="password" /></div>
      <div class="mt-2 flex gap-5 justify-center">
        <button class="bg-blue-200 px-5 py-2 rounded-lg" @click="login">Login</button>
        <button class="bg-red-200 px-5 py-2 rounded-lg" @click="logout">Logout</button>
      </div>
      <div class="mt-5"><label>email:</label><input type="text" v-model="userId" /></div>
      <div style="border: solid 1px; margin: 1rem; padding: 1rem; text-align: center;">
        <div v-if="user.id">
          <p>{{ user.name }}</p>
          <p>{{ user.email }}</p>
        </div>
        <div v-else>Not Found</div>
      </div>
      <p v-show="errMsg" class="text-red-500">{{ errMsg }}</p>
    </div>
  </div>
</template>
