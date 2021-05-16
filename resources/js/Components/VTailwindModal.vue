<template>
  <vue-final-modal
    v-slot="{ params, close }"
    v-bind="$attrs"
    :esc-to-close="true"
    classes="flex justify-center items-center"
    content-class="relative flex flex-col max-h-full mx-4 p-4 border dark:border-gray-800 rounded bg-white dark:bg-gray-900"
  >
    <span class="mr-8 text-2xl font-bold">
      <slot name="title"></slot>
    </span>
    <div class="flex-grow overflow-visible">
      <slot :params="params"></slot>
    </div>
    <div class="flex-shrink-0 flex justify-center items-center pt-4">
      <!-- <button class="vfm-btn" @click="$emit('confirm', close)">Confirm</button> -->
      <button ref="editsavebutton" id="editsave" class="vfm-btn" @click="$emit('edit', close)">Edit</button>
      <button id="closecancel" class="vfm-btn" @click="$emit('cancel', close)">Close</button>
      <!-- <button class="vfm-btn" @click="$emit('save', close)">Save</button> -->
    </div>
    <button class="absolute top-0 right-0 m-0" @click="close">
      <!-- <mdi-close></mdi-close> -->
    <svg focusable="false" width="2em" height="2em" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z" fill="currentColor"></path></svg>
    </button>
  </vue-final-modal>
</template>


<script>
export default {
  name: 'VTailwindModal',
  inheritAttrs: false,
  emits: ['cancel', 'confirm', 'edit', 'save']
}
</script>


<style>
/* give the buttons a button-y look */
button.vfm-btn {
    padding: .25rem .5rem;
    border-width: 1px;
    border-radius: .25rem;
}

/* put some space on left side of second/side-by-side button */
button.vfm-btn+button.vfm-btn {
    margin: 0 0 0 1rem;
}

html{
    font-family: DM Sans,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu,Cantarell,Noto Sans,sans-serif,BlinkMacSystemFont,Helvetica Neue,Arial,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
}

p {
    display: block;
    margin-top: 1.25em;
    margin-bottom: 1.25em;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
</style>

