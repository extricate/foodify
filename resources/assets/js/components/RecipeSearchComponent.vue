<template>
    <ais-index
            app-id="MN94X6PY1W"
            api-key="cbec1d46afcb648b88fc833049994eb2"
            index-name="recipes"
    >
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12">
                <form class="form-group">
                    <ais-search-box>
                    <div class="input-group input-group-lg">
                        <ais-input
                                placeholder="What are you craving for?"
                                :classNames="{
                            'ais-input': 'form-control search-form'
                        }"
                        />
                        <span class="input-group-append">
                        <button class="btn btn-primary" type="button">Search <i class="fal fa-search"></i></button>
                    </span>
                    </div>
                    </ais-search-box>
                </form>
            </div>
        </div>
        <ais-results inline-template :results-per-page="12">
            <div class="row">
                <div class="col-md-4" v-for="result in results" :key="result.objectID">
                    <div class="card card-carousel center-block">
                        <div class="card-carousel-overlay">
                            <div class="card card-carousel-image"
                                 :style="'background-image: url(\'' + result.thumbnail + '\')'">

                                <div class="card-carousel-title">
                                    <h1 :title="result.name">
                                        <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                                    </h1>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </ais-results>
        <ais-no-results>
            <template slot-scope="props">
                No results were found for "<i>{{ props.query }}</i>".
            </template>
        </ais-no-results>
        <div class="text-center">
            <ais-pagination class="pagination" :classNames="{
                                        'ais-pagination': 'pagination',
                                        'ais-pagination__item--active': 'active',
                                        'ais-pagination__item--disabled': 'disabled'
                                    }" v-on:page-change="onPageChange"/>
        </div>
    </ais-index>
</template>

<script>
    export default {
        props: ['appId', 'apiKey', 'index', 'query'],
        methods: {
            onPageChange() {
                window.scrollTo(0, 0);
            },
        },
    }
</script>

<style>
    .ais-highlight > em {
        font-weight: bold;
    }
</style>