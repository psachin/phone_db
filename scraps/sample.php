<HTML>
<!-- jobapp.html -->
   <BODY>
       <H1>Phop's Bicycles Job Application</H1>
       <P>Are you looking for an exciting career in the world of
       cycling?
          Look no further!
       </P>
       <FORM NAME='frmJobApp' METHOD=post ACTION="jobapp_action.php">
          Please enter your name:
          <INPUT NAME="applicant" TYPE="text"><BR>
          Please enter your telephone number:
          <INPUT NAME="phone" TYPE="text"><BR>
          Please enter your E-mail address:
          <INPUT NAME="email" TYPE="text"><BR>
          Please select the type of position in which you are
          interested:
          <SELECT NAME="position">
             <OPTION VALUE="a">Accounting</OPTION>
             <OPTION VALUE="b">Bicycle repair</OPTION>
             <OPTION VALUE="h">Human resources</OPTION>
             <OPTION VALUE="m">Management</OPTION>
             <OPTION VALUE="s">Sales</OPTION>
          </SELECT><BR>
          Please select the country in which you would like to work:
          <SELECT NAME="country">
             <OPTION VALUE="cn">Canada</OPTION>
             <OPTION VALUE="cr">Costa Rica</OPTION>
             <OPTION VALUE="de">Germany</OPTION>
             <OPTION VALUE="uk">United Kingdom</OPTION>
             <OPTION VALUE="us">United States</OPTION>
          </SELECT><BR>
          <INPUT NAME="avail" TYPE="checkbox"> Available
          immediately<BR><BR>
          <INPUT NAME="enter" TYPE="submit" VALUE="Enter">
       </FORM>
   </BODY>
</HTML>

