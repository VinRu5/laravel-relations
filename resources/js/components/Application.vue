<template>
<div class="comments">

    <h1>vue</h1>
</div>
</template>

<script>
export default {
    data() {
        return {
            comments: [],
        }
    },
    created() {
        axios.get('/api/comments?article_id=12').then((res) => {
            this.comments = res.data;    
        });

        let artID = //todo
        console.log(window.location.pathname);
    }
}
</script>