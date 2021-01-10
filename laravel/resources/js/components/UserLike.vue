<template>
  <div>
    <button
      type="button"
      class="c-button--like"
      :class="buttonColor"
      @click="clickLike"
    >
    {{ buttonText }}
      
    </button>
  </div>
</template>

<script>
export default {
  props: {
    initialLikedBy: {
      type: Boolean,
      default: false,
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
    }
  },
  computed: {
    buttonText() {
      return this.isLikedBy
      ? '登録済み'
      : 'リストに登録'
    },
    buttonColor() {
      return this.isLikedBy
        ? 'c-button-like c-button--active'
        : 'c-button-like c-button--before'
    },
  },
  methods: {
    clickLike() {
      if(!this.authorized) {
        alert('いいね機能はログイン中のみ利用できます')
        return
      }

      this.isLikedBy
        ? this.unlike()
        : this.like()
    },
    async like() {
      const response = await axios.put(this.endpoint)

      this.isLikedBy = true
    },
    async unlike() {
      const response = await axios.delete(this.endpoint)

      this.isLikedBy = false
    },
  },
}
</script>