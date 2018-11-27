export default {
    methods: {
        titleize(slug) {
            let words = slug.split("_");
            return words.map(function(word) {
                return word.charAt(0).toUpperCase() + word.substring(1).toLowerCase();
            }).join(' ');
        }
    }
}