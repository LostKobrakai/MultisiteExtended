# Mulitsite Extended Module

This module does enable users to set up custom domains for any page in the pagetree. To do that it does create a new field `multisite_root`, that can store a domainname. Add this to any template you need, go to a page using that template and setup a domain for that page. Now that page and every child of it will be available under the set domain.

For performance reasons the list of domains is cached for 24h. To clear the cache go to the module's settings and check the "Clear Cache" checkbox. The next time the module is run it will force a regeneration of the cache.
