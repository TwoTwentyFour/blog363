Send mail in LAMP using localhost on live site.

apt-get install php-pear
sudo apt pear install mail
sudo apt pear install Net_SMTP
sudo apt pear install Auth_SASL
sudo pear install mail_mime
sudo apt install postfix
    Configure:
        use right arrow key
        [ENTER]
        ->Internet Site
            [TAB][ENTER] on <Ok>
        Change 'System mail name:'
            to localhsot
                [TAB][ENTER] on <Ok>

In /etc/php/7.x/php.ini
    set sendmail path for Unix to 
        /usr/sbin/sendmail -t -i


Explanation:
    pear mail
        As described by the pear website, mail is a "Class that provides mulriple interfaces for seding emails".
        Pear mail works with different mailer backends includeing PHP's native mail() function.

        Learn more here <pear.php.net/package/mail>.

    Net_SMTP
        Using PEAR's Net_Socket class, Net_SMTP provides us with an implementation of the SMTP (Simple Mail Transport Protocol) protocol.

        Learn more about SMTP here <https://youtu.be/iVJDZRLBWz8>
        Learn more about Net_SMTP here <http://pear.github.io/Net_SMTP/>

    Auth_SASL
        I'm just going to quote from PEAR's website. "Abstraction of various SASL (Simple Authentication and Security Layer) mechanism responses." Like huh?
        It should be noted that Auth_SASL is no longer being supported. Auth_SASL2 is the new hotness but as of this
        it is still in beta. 

        Here, this terrible video explains SASL <https://youtu.be/exQF0fx469M>
        Learn more about Auth_SASL here <https://pear.php.net/package/Auth_SASL/redirected>
        And learn more about Auth_SASL2 here <https://pear.php.net/package/Auth_SASL2>

    mail_mime
        A collection of classes that can be used to create MIME (Multipurpose Internet Mail Extensions) messages.

        Learn more hete <https://pear.php.net/package/Mail_mime>
        And here is a great interview with Nathaniel Borenstein, one of the creators of MIME <https://youtu.be/LOUqh5xw99w>

    postfix
        Postfix is a mail server authored by Wietse Venema formerly of IBM and now Google. 

        Here's Postfix's home page <http://www.postfix.org/> 
