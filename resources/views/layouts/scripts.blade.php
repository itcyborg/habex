<!-- jQuery -->
<script src="{{asset('sys/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('sys/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('sys/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('sys/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('sys/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('sys/js/custom.min.js')}}"></script>
<script src="{{asset('sys/js/main.js?v=1')}}"></script>
<!--Style Switcher -->
<script src="{{asset('sys/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.js"></script>
<script>
    function check(val,name){
        if(val==='' || val==null){
            alertMsg('Please fill '+name);
        }
        return val;
    }

    function checkSilent(val){
        if(val==='' || val==null){
            return ' ';
        }
        return val;
    }
    function alertMsg(msg){
        alert(msg);
        throw new Error('Something went wrong');
    }
    function isDouble(val, name){
        if(val==='' || val==null){
            alertMsg('Please fill '+name);
        }
        var num=parseFloat(val);
        if(isNaN(num)){
            alertMsg('Wrong format for '+name+'.Enter a number');
        }
        return num;
    }

    //
    // function isDouble(val, name){
    //     if(val==='' || val==null){
    //         alertMsg('Please fill '+name);
    //     }
    //     var num=parseFloat(val);
    //     if(isNaN(num)){
    //         alertMsg('Wrong format for '+name+'.Enter a number');
    //     }
    //     return num;
    // }
</script>