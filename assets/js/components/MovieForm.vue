<template>
  <form @submit.prevent="onSubmit">
    <span v-text="errors"></span>

    <div>
      <input type="text" placeholder="enter movie title..." v-model="title">
    </div>
    <button>Add Movie</button>
  </form>
</template>

<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        title: '',
        errors: ''
      }
    },
    methods: {
      onSubmit() {
        this.postMovie()
      },
      async postMovie() {
        axios.post('http://127.0.0.1:8000/movie', this.$data)
          .then(res => {
            this.title = ''
            this.$emit('completed', res.data)
          })
          .catch(error => {
            this.errors = error.response.data.errors
          })
      }
    }
  }
</script>