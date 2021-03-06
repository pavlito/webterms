# LcG-SEO-Sites

* PHP 5.6
* nginx

## Setup your .env

Create your `.env` file by using the example from `env.example.txt`.

You can copy the LCG API credentials from there as it would work with our official API.

**Do not share the credentials!**

### Limitations

Please note that the wizard is generated by the API so the `form action` parameter cannot be changed. You will be redirected to a non-existing website (localhost).

However, you can use already created agreement tokens to populate your `download.php` and `live.php` pages.

Example of tokens that you can use for the `live.php` and `download.php`:

- `privacy-policy` --> LyyMof9tDs5dp12n95pSMOc5RGtjBOJO
- `terms-conditions` --> 6xmANIxvzkCk048AN4fsgdxj58QCQD0y
- `disclaimer` --> cJTn0hjxt4mndUFRD4kGxTn3ODeYO3Ad
- `eula` --> vH58eIFKEH5liWFegi5Vq5lZdXiYt8j1
- `return-refund-policy` --> 2Y6JDm6vCaZIWeOba1VssftpKooaDXwh

Please note that the agreement type/name (ie. privacy-policy, disclaimer) must match the token. Otherwise, no agreement text is delivered.

How to use these tokens:

1. Open the `live.php` or `download.php` by appending the `token` parameter:

     /download.php?lang=en&token=6xmANIxvzkCk048AN4fsgdxj58QCQD0y
     /live.php?token=6xmANIxvzkCk048AN4fsgdxj58QCQD0y
     
2. Make sure that the agreement type/name matches the token.