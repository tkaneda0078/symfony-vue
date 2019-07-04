<template>
  <table>
    <tbody>
      <tr>
        <th>ID</th>
        <th>Titlw</th>
        <th>Count</th>
      </tr>
      <template v-for="movie in movies">
        <tr v-bind:key="movie.id">
          <td>{{ movie.id }}</td>
          <td>{{ movie.title }}</td>
          <td>{{ movie.count }}</td>
        </tr>
      </template>
    </tbody>
  </table>
</template>

<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        movies: {}
      }
    },
    async created () {
      const response = await axios.get('http://127.0.0.1:8000/movie')
      this.movies = response.data
    }
  }
</script>