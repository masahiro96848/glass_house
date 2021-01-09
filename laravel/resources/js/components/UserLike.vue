<template>
  <div>
    <button
      type="button"
      class=""
    >
    {{ buttonText }}
  <i class="fas fa-heart"
      :class="{'red-text':this.isLikedBy}"
      @click="clickLike"
  >

  </i>
    </button>
    {{countLikes}}
  </div>
</template>

<script>
export default {
  props: {
    initialLikedBy: {
      type: Boolean,
      default: false,
    },
    initialCountLikes: {
      type: Number,
      default:0,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
    }
  },
  data() {
    return {
      isLikedBy: this.initialLikedBy,
      countLikes: this.initialCountLikes,
    }
  },
  computed: {
    buttonText() {
      return this.isLikedBy
      ? 'リストに登録'
      : '登録済み'
    },
  },
  methods: {
    clickLike() {
      if(!this.authorized) {
        alert('いいね機能はログイン中のみ利用できます')
        return
      }

      this.isLikedBy
        ?this.unlike()
        :this.like()
    },
    async like() {
      const response = await axios.put(this.endpoint)

      this.isLikedBy = true
      this.countLikes = response.data.countLikes
    },
    async unlike() {
      const response = await axios.delete(this.endpoint)

      this.isLikedBy = false
      this.countLikes = response.data.countLikes
    },
  },
}
</script>