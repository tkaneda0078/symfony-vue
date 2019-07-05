<template>
  <div>
    <table>
      <tbody>
      <tr>
        <th>ID</th>
        <th>Title</th>
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
    <movie-form @completed="addMovie"></movie-form>
  </div>
</template>

<script>
  import axios from 'axios'
  import MovieForm from './MovieForm.vue'

  export default {
    components: {
      MovieForm
    },
    data() {
      return {
        movies: {}
      }
    },
    async created () {
      const response = await axios.get('http://127.0.0.1:8000/movie')
      this.movies = response.data
    },
    methods: {
      addMovie(movie) {
        this.movies.push(movie)
      }
    }
  }
</script>