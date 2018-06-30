# Achievements

A mod for supporting achievements being gained by accounts, typically for roleplay purposes.

**As of 2018 this mod is 100% deprecated. All of the features are being transferred to the [StoryBB](https://github.com/StoryBB/StoryBB) project which is a rewritten SMF with roleplay as a set of core features.**

Features (not all implemented yet!):
 * Achievements that can be earned based on number of posts/topics created, likes received
 * Achievements that can be collected in tracks such that one can have tiers of achievements to work towards
 * Achievements that can be assigned manually by the administrator
 * A full display in the account profile (and for characters, character profile achievements) of all achievements earned and ones unlocked and in progress
 * An internal currency system such that some achievements can be treated like store items to be purchased, and optionally given on receipt of achievements
 * Meta achievements based on receiving multiple achievements together
 * Allow adding groups to account upon receiving an achievement

# Caveats
 * PHP 5.4 is required.
 * It's primarily designed to be used with my Characters mod, so some unexpected behaviour may occur.
 * Some queries may fail with PostgreSQL, but the use case for PostgreSQL is sufficiently limited this is not a problem.

# Disclaimer

This was built for one site in particular for roleplay use. If you want to run a roleplay site with this mod, there are a few caveats.

 * This was built for SMF 2.1 only. I have neither the time or interest to build (or maintain) a 2.0 version.
 * Support is largely nil. I'll fix legitimate bugs, but new features or other improvements are unlikely to materialise.
 * It's not designed for anything except being used with the Characters mod. It might work without but it's certainly not supported. This is not going to change, sorry.
 * If it doesn't work how you'd like, I'm sorry, but you're on your own, it's built for one specific site and their needs.
 * This is not a good guide of how to write a mod. It does things in a quick and dirty way in most places.
 * If you want to build another version of this mod, it's BSD licensed so you can go nuts, you just can't remove my name from it and can't claim it entirely as your own.
