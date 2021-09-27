<template>
  <div class="comments">
    <div class="comments-container">
      <div class="comments-inner">
        <div v-for="comment in comments" :key="comment.id" class="comment">
          <div class="comment-user">{{ comment.user }}</div>
          <div class="comment-text">{{ comment.text }}</div>
          <div class="comment-date">{{ dataArticle(comment.created_at) }}</div>
    
        </div>
        <div class="comment">
          <textarea v-model="textComment" @keyup.enter="sendComment"></textarea>
          <button @click="sendComment" class="button-custom button-custom-blue">Pubblica</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      comments: [],
      articleID: window.location.pathname.replace("/articles/", ""),
      textComment: '',
    };
  },
  created() {
    this.getComments();
  },
  computed: {

  },
  methods: {
    dataArticle(date) {
      var dayjs = require('dayjs');
      return dayjs(date).format('DD MMM YYYY');
    },
    getComments() {
      axios.get(`/api/comments?article_id=${this.articleID}}`).then((res) => {
        this.comments = res.data;
      });
    },

    sendComment() {
      axios.post('/api/comments', {
        text: this.textComment,
        article_id: this.articleID
      }).then((res)=>  {
        this.comments = res.data.data;
      });

      this.textComment = '';
    }
  },
};
</script>