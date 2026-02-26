<div class="d-flex justify-content-center my-4" x-show="meta.last_page > 1">

    <button
        class="btn btn-outline-secondary me-2"
        @click.prevent="prev"
        :disabled="page === 1">
        {{ __('Prev') }}
    </button>

    <template x-for="p in meta.last_page" :key="p">
        <button
            class="btn me-1"
            :class="p === page ? 'btn-primary' : 'btn-outline-primary'"
            @click.prevent="goTo(p)"
            :disabled="page === p"
            x-text="p">
        </button>
    </template>

    <button
        class="btn btn-outline-secondary ms-2"
        @click.prevent="next"
        :disabled="page === meta.last_page">
        {{ __('Next') }}
    </button>

</div>
