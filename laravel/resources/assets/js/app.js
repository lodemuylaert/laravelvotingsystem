require('../../../node_modules/jquery');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');
require('materialize-css');
//moment method voor timeformat in vue js
var moment = require('moment');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('navigation', require('./components/candidatelist.vue'));

const app = new Vue({
    el: '#app',
    data: {
        partijen: [],
        votelist: [],
        checkedCandidates: [],
        maxCandidates: 10,
        checkedParties: [],
        maxParties: 1,
        isActive: '',
    },
    methods: {

        submit: function(){
                axios.post('api/user/createvote',{
                userid: window.Userid,
                partie: this.checkedParties,
                candidates: this.checkedCandidates,
            }).then(function(response){
                window.location = response.data.redirect + "?" + response.data.message;
            }).catch(function (error) {
                this.message = error;
            });
        },
        sortByName: function (list) {
            return _.orderBy(list, 'name', 'asc');
        },

        voted: function () {

                  if(this.votelist.vote != null){
                    var partij =this.votelist.vote.partie;
                    var candidaten = this.votelist.vote.candidates;
                    var i = 0;
                    var self = this;
                    if(!candidaten == "") {
                        candidaten.forEach(function (entry) {
                            Vue.set(self.checkedCandidates, i, entry);
                            i++;
                        });
                    }
                Vue.set(self.checkedParties, 0, partij);
            }

        }
     },
    filters: {
        date: function (date) {
            return moment(date).format('HH:mm');{}
        }
    },
    mounted: function(){
        axios.get('api/partijen').then( response => this.partijen = response.data);
        axios.get('api/user/'+ window.Userid +'/vote').then(response => this.votelist = response.data);

    },


});



//  submits


$(function(){
    $('#savenewpartie').on('click', function(){
        $('#savenewpartieform').submit();
    });
    $('#savenecandidate').on('click', function(){
        $('#savenecandidateform').submit();
    });
    $('#editcandidate').on('click', function(){
        $('#editcandidateform').submit();
    });
    $('#deletecandidate').on('click', function () {
        $('#deletecandidateform').submit();
    });
    $('#editpartie').on('click', function () {
        $('#editpartieform').submit();
    });
    $('#deletepartie').on('click', function () {
        $('#deletepartieform').submit();
    });
    $('#savenewvoter').on('click', function () {
        $('#savenewvoterform').submit();
    });
    $('#savenewadmin').on('click', function () {
        $('#savenewadminform').submit();
    });

    //thumbnails
    $('#outputbutton').on('change', function() {

            var output = document.getElementById('output');
            output.src = window.URL.createObjectURL(this.files[0])

    })
    $('#outputbuttonnew').on('change', function() {
            console.log('klik');
        var output = document.getElementById('outputnew');
        output.src = window.URL.createObjectURL(this.files[0])

    })
})



//flashmessage fade

$('#flashmessage, #flashmessagefail').delay(500).fadeIn('normal', function() {
    $(this).delay(5000).fadeOut();
});


//toggles
(function(){

    $('dl').on('click', 'dt', function() {
        $(this).next().next().next().slideToggle(200);
    });

})();

(function () {
    //piechart for backoffice
    function polar_to_cartesian(centerX, centerY, radius, angle_in_degrees) {
        var angle_in_radians = (angle_in_degrees-90) * Math.PI / 180.0;

        return {
            x: centerX + (radius * Math.cos(angle_in_radians)),
            y: centerY + (radius * Math.sin(angle_in_radians))
        };
    }


    function describe_arc(x, y, radius, start_angle, end_angle){
        var start = polar_to_cartesian(x, y, radius, end_angle);
        var end = polar_to_cartesian(x, y, radius, start_angle);
        var arc_sweep = end_angle - start_angle <= 180 ? "0" : "1";
        var d = [
            "M", start.x, start.y,
            "A", radius, radius, 0, arc_sweep, 0, end.x, end.y
        ].join(" ");

        return d;
    }


    function draw_circle_diagram(){

        var $circle_diagrams = document.getElementsByClassName('circle-diagram');

        for (var $i = 0; $i < $circle_diagrams.length; $i++){
            var $svg_width =    $circle_diagrams[$i].getAttribute("width");
            var $svg_height =   $circle_diagrams[$i].getAttribute("height");
            var $stroke_color = $circle_diagrams[$i].getAttribute("data-stroke-color");
            var $stroke_width = $circle_diagrams[$i].getAttribute("data-stroke-width");
            var $radius =       parseInt(($svg_height/2) - ($stroke_width / 2),10);
            var $path =         $circle_diagrams[$i].querySelector('.circle-diagram__arc');
            var $text =         $circle_diagrams[$i].querySelector('.circle-diagram__text');
            var $percent =      $circle_diagrams[$i].getAttribute("data-percent");

            if($percent < 0)
                $percent = 0;
            if($percent < 100 && $percent >= 0)
                $path.setAttribute("d", describe_arc($svg_width/2, $svg_height/2, ($svg_height/2) - ($stroke_width / 2), 0, (360*$percent)/100));
            if($percent >= 100) {
                $path.setAttribute("d", "M "+$svg_width/2+", "+$svg_height/2+" m -"+$radius+", 0 a "+$radius+","+$radius+" 0 1,0 "+$radius*2+",0 a "+$radius+","+$radius+" 0 1,0 -"+$radius*2+",0"); // это выдаст окружность
                $percent = 100;
            }

            $path.setAttribute("stroke", $stroke_color);
            $path.setAttribute("stroke-width", $stroke_width);

            // $text.textContent = $percent + "%";
            $text.setAttribute("y", $svg_height/2 + 4);


        }
    }

    draw_circle_diagram();


})();