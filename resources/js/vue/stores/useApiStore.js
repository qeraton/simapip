import { defineStore } from 'pinia'

export const useApiStore = defineStore('apiStore', {
    state: () => ({
        config: {
            loading: true,
            assetBaseUrl: process.env.ASSET_BASE_URL
        },
        token: '',
        errors: null,
        showLoading: false,
        dialog: false,
        dialogTitle: '',
        dialogMessage: ''
    }),

    getters: {

    },

    actions: {

    }
})
