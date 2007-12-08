/**
 * Elapsed time - returns the seconds (rounded) elapsed from when page was loaded.
 * 
 * @author Michael Huynh (http://www.mikexstudios.com)
 */     

var start_time;
start_time = (new Date()).getTime();

function elapsed_time() {
  var present_time;
  present_time = (new Date()).getTime();
  //Divide by 1000 to get seconds. Round to nearest whole number.
  return Math.round((present_time - start_time) / 1000); 
}
