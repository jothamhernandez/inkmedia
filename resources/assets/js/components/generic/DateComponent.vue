<template>
    <div>
        <p>{{datefixed}}</p>
    </div>
</template>

<script>
export default {
    data(){
        return {
            months:[
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ]
        }
    },
    computed:{
        datefixed(){
            var dateParts = this.date.split("-");
            var jsDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2].substr(0,2));
            return this.months[jsDate.getMonth()] + " " + jsDate.getDate() + ", " + jsDate.getFullYear();
        }
    },
    props: {
        date: String
    }
}
</script>

<style scoped>
    div {
        display: inline;
    } 
    p{
        display: inline;
    }
</style>
