<template>
    <select class="form-select form-select-sm w-25" v-model="selectedAuthor">
        <option value="">Все авторы</option>
        <option v-for="author in authors" :key="author.id" :value="author.id">{{ author.name }}</option>
    </select>
</template>

<script>
export default {
    data() {
        return {
            authors: [],
            selectedAuthor: ''
        }
    },
    mounted() {
        this.loadAuthors()
    },
    methods: {
        async loadAuthors() {
            const url = '/api/authors'
            const response = await fetch(url)
            if (response.ok) {
                const data = await response.json()
                this.authors = data.data
            } else {
                console.error('Ошибка загрузки авторов')
            }
        }
    },
    watch: {
        selectedAuthor(newValue) {
            this.$emit('filter', newValue)
        }
    }
}
</script>
