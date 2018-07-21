# phpStringToMBString
A context-unaware rewriter from php string functions to php mb string functions.
This script will run through a directory recursively and rewrite string functions to mb_string variants.
Since this is a context-unaware script that i have made to help me upgrade some of my old projects please be aware that this will REWRITE texts/comments INSIDE .php files for example if you write the world mail by itself it will be rewritten to mb_send_mail

This tool should only be used with care and make sure you have a backup. The best solution is ofcourse to have versioning (svn/git/whatever)
The tool is provided as is and please feel free to make pull-requests if you think you can improve it.
