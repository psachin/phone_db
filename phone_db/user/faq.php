<?php
session_start();
if (@$_SESSION["auth"] != "yes" || @$_SESSION["phlogname"] == "login_name") 
  {
    header("Location: ../login.php");
    exit();
  }
else
  require("../user/header.php");
?>
   <a name="top"></a>
   <h1>Frequently Asked Questions</h1>
<i>shamelessly copied from GNU Emacs manual.</i>
   <ul>
  <li><a href="#1">The GNU Manifesto</a></li>
      <li><a href="#2">What's GNU?  Gnu's Not Unix!</a></li>
      <li><a href="#3">Why I Must Write GNU</a></li>
      <li><a href="#4">Why GNU Will Be Compatible with Unix</a></li>
      <li><a href="#5">How GNU Will Be Available</a></li>
   </ul>
<a name="1"></a>
  <h2>The GNU Manifesto</h2>
<p>
       The GNU Manifesto which appears below was written by Richard
     Stallman at the beginning of the GNU project, to ask for
     participation and support.  For the first few years, it was
     updated in minor ways to account for developments, but now it
     seems best to leave it unchanged as most people have seen it.

     Since that time, we have learned about certain common
     misunderstandings that different wording could help avoid.
     Footnotes added in 1993 help clarify these points.

     For up-to-date information about available GNU software, please see
     our web site, `http://www.gnu.org'.  For software tasks and other
     ways to contribute, see `http://www.gnu.org/help'.
</p>
<p><a href="#top">Back to the top</a></p>
<a name="2"></a>
<h2>What's GNU?  Gnu's Not Unix!</h2>
<p>
GNU, which stands for Gnu's Not Unix, is the name for the complete
Unix-compatible software system which I am writing so that I can give it
away free to everyone who can use it.(1) Several other volunteers are
helping me.  Contributions of time, money, programs and equipment are
greatly needed.

   So far we have an Emacs text editor with Lisp for writing editor
commands, a source level debugger, a yacc-compatible parser generator,
a linker, and around 35 utilities.  A shell (command interpreter) is
nearly completed.  A new portable optimizing C compiler has compiled
itself and may be released this year.  An initial kernel exists but
many more features are needed to emulate Unix.  When the kernel and
compiler are finished, it will be possible to distribute a GNU system
suitable for program development.  We will use TeX as our text
formatter, but an nroff is being worked on.  We will use the free,
portable X window system as well.  After this we will add a portable
Common Lisp, an Empire game, a spreadsheet, and hundreds of other
things, plus on-line documentation.  We hope to supply, eventually,
everything useful that normally comes with a Unix system, and more.

   GNU will be able to run Unix programs, but will not be identical to
Unix.  We will make all improvements that are convenient, based on our
experience with other operating systems.  In particular, we plan to
have longer file names, file version numbers, a crashproof file system,
file name completion perhaps, terminal-independent display support, and
perhaps eventually a Lisp-based window system through which several
Lisp programs and ordinary Unix programs can share a screen.  Both C
and Lisp will be available as system programming languages.  We will
try to support UUCP, MIT Chaosnet, and Internet protocols for
communication.

   GNU is aimed initially at machines in the 68000/16000 class with
virtual memory, because they are the easiest machines to make it run
on.  The extra effort to make it run on smaller machines will be left
to someone who wants to use it on them.

   To avoid horrible confusion, please pronounce the `G' in the word
`GNU' when it is the name of this project.
</p>
<p><a href="#top">Back to the top</a></p>
<a name="3"></a>
<h2>Why I Must Write GNU</h2>
<p>
I consider that the golden rule requires that if I like a program I must
share it with other people who like it.  Software sellers want to divide
the users and conquer them, making each user agree not to share with
others.  I refuse to break solidarity with other users in this way.  I
cannot in good conscience sign a nondisclosure agreement or a software
license agreement.  For years I worked within the Artificial
Intelligence Lab to resist such tendencies and other inhospitalities,
but eventually they had gone too far: I could not remain in an
institution where such things are done for me against my will.

   So that I can continue to use computers without dishonor, I have
decided to put together a sufficient body of free software so that I
will be able to get along without any software that is not free.  I
have resigned from the AI lab to deny MIT any legal excuse to prevent
me from giving GNU away.
</p>
<p><a href="#top">Back to the top</a></p>
<a name="4"></a>
<h2>Why GNU Will Be Compatible with Unix</h2>
<p>
Unix is not my ideal system, but it is not too bad.  The essential
features of Unix seem to be good ones, and I think I can fill in what
Unix lacks without spoiling them.  And a system compatible with Unix
would be convenient for many other people to adopt.
</p>
<p><a href="#top">Back to the top</a></p>
<a name="5"></a>
<h2>How GNU Will Be Available</h2>
<p>
GNU is not in the public domain.  Everyone will be permitted to modify
and redistribute GNU, but no distributor will be allowed to restrict its
further redistribution.  That is to say, proprietary modifications will
not be allowed.  I want to make sure that all versions of GNU remain
free.
</p>
<p><a href="#top">Back to the top</a></p>
<?php
  require("footer.php");
?>
