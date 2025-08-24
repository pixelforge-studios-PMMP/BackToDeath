# BackToDeath Plugin

A powerful PocketMine-MP plugin that allows players to teleport back to their last death location with a simple command.

## 📋 Features

- **Death Location Tracking**: Automatically records player death positions
- **Easy Teleportation**: Use `/back` command to return to your last death point
- **Permission System**: Control who can use the back command
- **Cooldown System**: 5-minute cooldown to prevent command spam
- **World Management**: Automatically loads worlds if they're not already loaded
- **Memory Efficient**: Uses lightweight caching system

## 🚀 Installation

1. Download the latest `BackToDeath.phar` file from releases
2. Place the `.phar` file in your server's `plugins/` directory
3. Restart your server
4. The plugin will automatically enable and be ready to use

## ⚙️ Configuration

The plugin now supports configuration through `config.yml` file. Server owners can customize cooldown times and messages.

### Configuration Options:

```yaml
# BackToDeath Plugin Configuration

# Cooldown settings
cooldown:
  # Cooldown time in seconds (default: 300 seconds = 5 minutes)
  time: 300

# Message settings
messages:
  # Message when command is used from console
  console_only: "§cThis command can only be used in-game."
  
  # Message when player doesn't have permission
  no_permission: "You Dont Have Permission To Use This Command."
  
  # Message when command is on cooldown
  on_cooldown: "You must wait some more!"
  
  # Message when player hasn't died recently
  no_death: "You haven't died recently!"
  
  # Message when teleportation is successful
  success: "You have been successfully teleported to your last death point."
```

To modify these settings:
1. Edit the `plugins/BackToDeath/config.yml` file
2. Restart your server or reload the plugin
3. Changes will take effect immediately

## 🔧 Commands

### `/back`
Teleports you to your last death location.

**Usage:** `/back`

**Permission:** `back.cmd.use` (default: op)

**Cooldown:** Configurable (default: 5 minutes)

## 🔐 Permissions

| Permission | Description | Default |
|------------|-------------|---------|
| `back.cmd.use` | Allows players to use the `/back` command | op |

## 🎯 How It Works

1. When a player with permission dies, their death location is automatically recorded
2. The location is stored in memory (X, Y, Z coordinates and world name)
3. When the player uses `/back`, the plugin:
   - Checks if they have permission
   - Verifies they have a stored death location
   - Ensures the cooldown period has expired
   - Loads the world if necessary
   - Teleports the player to their death location
   - Sets a new 5-minute cooldown

## 🏎️ Performance

The BackToDeath plugin utilizes a **high-performance caching system** for storing player death locations and cooldowns. This ensures:
- **No Lag**: Efficient data retrieval and storage and no server load.
- **Stable Performance**: Data was remove on server restarts, providing a reliable experience for players.

## 📝 API Compatibility

- **PocketMine-MP API**: 5.0.0+
- **PHP Version**: 8.0+

## 🐛 Troubleshooting

**Q: I get "You haven't died recently!" message**
A: This means the plugin doesn't have a recorded death location for you. Die first, then use `/back`.

**Q: I get "You must wait some more!" message**
A: You need to wait 5 minutes between uses of the `/back` command.

**Q: The command doesn't work for non-op players**
A: By default, only operators have permission. You can change this in your permissions configuration.

## 🤝 Support

If you encounter any issues or have suggestions:
1. Check this README for common solutions
2. Ensure you're using a compatible PocketMine-MP version
3. Verify the plugin is properly installed

## 📄 License

This plugin is provided as-is. Feel free to modify and distribute with proper credit.

## 🏆 Credits

**Developer**: Biswajit  
**Plugin Name**: BackToDeath  
**Version**: 1.0.0

---

⭐ **Enjoy the convenience of returning to your death locations with ease!** ⭐
