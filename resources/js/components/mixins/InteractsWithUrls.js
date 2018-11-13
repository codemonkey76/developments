export default {
    methods: {
        urlOpen(url = '/'){
            window.open(url,'_blank')
        },
        urlRedirect(url = '/'){
            window.location.replace(url)
        },
        urlRoute(url = '/'){
            window.location.href = url
        },
    }
}
