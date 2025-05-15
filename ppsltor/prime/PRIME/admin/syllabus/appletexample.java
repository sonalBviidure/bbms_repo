
// Java program to run the applet 
// using the web browser
 
import java.awt.*;
import java.applet.*;
public class appletexample extends Applet
{
     String msg="";
     public void init()
    {
         msg="Hello Geeks";
     }
 
     public void start()
     {
         msg=msg+",Welcome to GeeksForGeeks";
     }
 
     public void paint(Graphics g)
     {
         g.drawString(msg,20,20);
     }


*/
<applet code="GfgApplet.class" width=300 height=100></applet>
*/
