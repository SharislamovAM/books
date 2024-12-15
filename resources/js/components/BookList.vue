<template>
    <div>
        <AuthorFilter @filter="applyFilter" />
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center">№ п/п</th>
                <th>Название книги</th>
                <th>Авторы</th>
                <th class="text-center">Количество авторов</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(book,index) in filteredBooks" :key="book.id">
                <td class="text-center">{{ index + 1 }}</td>
                <td>{{ book.title }}</td>
                <td>{{ book.authors.map(author => author.name).join(', ') }}</td>
                <td class="text-center">{{ book.authors.length }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import AuthorFilter from "./AuthorFilter.vue";
import dotenv from 'dotenv'
export default {
    name: "BookList",
    components: {
        AuthorFilter
    },
    data() {
        return {
            books: [],
            filteredBooks: []
        }
    },
    mounted() {
        this.loadBooks()
    },
    methods: {
        async loadBooks() {
            const url = window.location.origin
            const response = await fetch(`${url}/api/books`)
            const data = await response.json()
            this.books = data.data
            this.filteredBooks = this.books
        },
        applyFilter(authorId) {
            if (authorId) {
                this.filteredBooks = this.books.filter(book => book.authors.some(author => author.id === authorId))
            } else {
                this.filteredBooks = this.books
            }
        }
    }
}
</script>

<style scoped>

</style>
