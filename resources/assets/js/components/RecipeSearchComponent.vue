<template>
    <ais-index
            app-id="IWZNEZ7S75"
            api-key="6830a68c499eb7bbab40ed07a49f38f9"
            index-name="recipes"
            v-bind:auto-search=false
    >
        <div class="row justify-content-center">
            <div class="col-lg-12 col-sm-12">
                <form class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <ais-search-box placeholder="What are you craving for?">
                                <div class="input-group input-group-lg">
                                    <ais-input
                                            placeholder="What are you craving for?"
                                            :classNames="{
                            'ais-input': 'form-control search-form'
                        }"
                                    />
                                    <span class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    Search <i class="fal fa-search"></i>
                                </button>
                            </span>
                                </div>
                            </ais-search-box>
                        </div>
                        <div class="col-lg-1 align-content-left align-items-center d-none d-lg-block">
                            <div class="algolia ml-0 mt-3">
                                <ais-powered-by></ais-powered-by>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="search-results">
            <ais-results inline-template :results-per-page="3">
                <div class="row card-columns">
                    <div class="col-md-4" v-for="result in results" :key="result.objectID">
                        <div class="card mt-3">
                            <div class="card-img-container">
                                <img class="card-img-top" :src="result.image" :alt="result.name">
                            </div>
                            <div class="card-body">
                                <a v-bind:href="'/recipes/'+ result.id">
                                    <h1 class="card-title" :title="result.name">
                                        <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                                    </h1>
                                </a>
                                <p class="card-text card-truncated" v-html="result.description"></p>
                                <p class="text-center">
                                    <a v-bind:href="'/recipes/'+ result.id" class="btn btn-primary">
                                        Go to recipe <i class="fal fa-arrow-right"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </ais-results>
            <ais-no-results>
                <template slot-scope="props">
                    <div class="row">
                        <div class="col text-center" v-if="props.query !== ''">
                            <div class="alert alert-warning" role="alert">
                                No results were found for <strong>"<i>{{ props.query }}</i>"</strong>.
                            </div>
                        </div>
                    </div>
                </template>
            </ais-no-results>
        </div>
        <div class="text-center">
            <ais-pagination class="pagination" :classNames="{
                                        'ais-pagination': 'pagination',
                                        'ais-pagination__item': 'page-item',
                                        'ais-pagination__link': 'page-link',
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
            /*searchFunction: function (helper) {
                let searchResults = $('.search-results');
                if (this.searchStore.query === '') {
                    searchResults.hide();
                    return;
                }
                helper.search();
                searchResults.show();
            },*/
            onPageChange() {
                window.scrollTo(0, 0);
            },
        },
        /*mounted: function () {
            this.searchFunction();
        }*/
    }
</script>

<style>
    .ais-highlight > em {
        font-weight: bold;
    }
</style>