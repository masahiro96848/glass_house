<template>
  <div>
    <button
      type="button"
      class=""
    >
    {{ buttonText }}
  <i class="fas fa-heart"
      :class="{'red-text':this.isLikedBy}"
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
}
</script>