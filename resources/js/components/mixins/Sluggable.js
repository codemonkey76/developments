export default {
    methods: {
        /** Transform a Sluggable Attribute. **/
        toSlug(str){
            str = str.toLowerCase()
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();
            let from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            let to   = "aaaaeeeeiiiioooouuuunc------";
            for (let i=0, l=from.length ; i<l ; i++){
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            return str.replace('.', '-')
                .replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
        },
    }
}
