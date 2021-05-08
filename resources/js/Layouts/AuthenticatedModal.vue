
<!-- This is a modal Vue component's wrapper template, so all menus are stripped out. We might add back in an 'X' or similar. -->
<!-- We might not even need this.... -->

<template>
    <div>
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>


<script>

    export default {
        components: {
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
    }
</script>




