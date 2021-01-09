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
    10
  </div>
</template>

<script>
export default {
  props: {
    initialLikedBy: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      isLikedBy: this.initialLikedBy,
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