# Setting up your Plugin files using Sed

These directions are provided to outline an example setup of the Boilterplate to create a plugin called `My Awesome Plugin`. Following these steps and substituting your information will enable you to quickly setup your basic plugin.

Once you have completed these 9 steps you will be able to begin creating your plugin and adding your functionality.


1. Rename all the files to match your plugin name.
    * From the main boilerplate folder run:
> chmod +x ./scripts/rename.sh
> ./scripts/rename.sh "my-awesome-plugin"

  Note: You should use your information instead of `my-awesome-plugin`; provide your plugins name using the same style as these are for file names.

  Now your plugin files should be renamed appropriately. In the following steps you update the rest of the boilerplate variables.

  * Optional: Initialize your Git repo here, or wait until you're done with all these steps.

2. Search for `'wp-plugin-bp'` and replace with `'my-awesome-plugin'`
>find . -type f|grep -v ".git"| xargs sed -i "s/wp-plugin-bp/my-awesome-plugin/gi"

  Note: You should use your information instead of `my-awesome-plugin`; provide your plugin's name using the same format as shown.

3. Search for `'Wp_Plugin_Bp'` and replace with `'My_Awesome_Plugin'`
>find . -type f|grep -v ".git"| xargs sed -i "s/Wp_Plugin_Bp/My_Awesome_Plugin/gi"

  Note: You should use your information instead of `My_Awesome_Plugin`; provide your plugin's name using the same format as shown.

4. Search for `'wp_plugin_bp'` and replace with `'my_awesome_plugin'`
>find . -type f|grep -v ".git"| xargs sed -i "s/wp_plugin_b/my_awesome_plugin/gi"

  Note: You should use your information instead of `my_awesome_plugin`; provide your plugin's name using the same format as shown.

5. Search for `'WordPress Plugin Boilerplate'` and replace with `'My Awesome Plugin'`
>find . -type f|grep -v ".git"| xargs sed -i "s/WordPress Plugin Boilerplate/My Awesome Plugin/gi"

  Note: You should use your information instead of `My Awesome Plugin`; provide your plugin's name in human friednly form, this instance is user viewable.

6. Search for `'Your Name or Your Company'` and replace with `'Awesome Guy'`
>find . -type f|grep -v ".git"| xargs sed -i "s/Your Name or Your Company/Awesome Guy/gi"

  Note: You should use your information instead of `Awesome Guy`; provide either your name, your company's name, or both.

7. Search for `'Your Name <email@example.tld>'` and replace with `'Awesome Guy <guy@awesome.tld>'`
>find . -type f|grep -v ".git"| xargs sed -i "s/Your Name <email@example.tld>/Awesome Guy <guy@awesome.tld>/gi"

  Note: You should use your information instead of `Awesome Guy <guy@awesome.tld>`; provide your name and then your email address in the braces.

8. Search for `'http://example.tld/'` and replace with `'http://awesome.tld/'`
>find . -type f|grep -v ".git"| xargs sed -i "s#http://example.tld/#http://awesome.tld/#gi"

  Note: You should use your information instead of `http://awesome.tld/`; provide the URL to the domain associated with the plugin, or the WordPress.org URL to the plugin.

9. Finally, open your main plugin file and update the `Plugin URI` field to match the specific URL for the plugin.

  Note: Generally this should always match the WordPress.org URL to the plugin, however you provide any URL so long as it's related to the plugin. E.G. a landing page for the plugin.

---

You are now complete with setting up the initial plugin code and base structure. You can begin building out your plugin once you've initialized you Git repo, unless you did that as part of step 1. Either way, you'll initialize (or commit to) your repo and then begin creating!
